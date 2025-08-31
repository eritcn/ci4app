<?php
namespace App\Controllers;

use Myth\Auth\Models\UserModel;
use Myth\Auth\Authorization\GroupModel;

class Admin extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
      $this->db    = \Config\Database::connect();
    $this->builder = $this->db->table('users');
    }
      public function index(): string
    {
        $data ['title'] = 'User List';
        // $users = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findAll();
    $this->builder->select('users.id as userid, username, email, name');
    $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
    $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
    $query = $this->builder->get();
    $data ['users'] = $query->getResult();
        return view('admin/index', $data);
    }
      public function detail($id = 0): string
    {
        $data ['title'] = 'User Detail';
    $this->builder->select('users.id as userid, username, email, fullname, user_image, name');
    $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
    $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
    $this->builder->where('users.id', $id);
    $query = $this->builder->get();

    $data ['user'] = $query->getRow();

    if(empty($data['user'])) {
        return redirect()->to ('/admin');
    }
    

        return view('admin/detail', $data);
    }
    

    
// public function editRoleList()
// {
//     $this->builder->select('users.id as user_id, username, email, name'); // ubah ke user_id biar sama
//     $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id', 'left');
//     $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id', 'left');
//     $query = $this->builder->get();
    
//     $data['users'] = $query->getResult();
//     $data['title'] = 'Kelola Role';

//     return view('admin/edit_role', $data);
// }

public function editRoleList()
{
    $this->builder->select('users.id as user_id, username, email, auth_groups.name as role_name');
    $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id', 'left');
    $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id', 'left');
    $query = $this->builder->get();
    
    $data['users'] = $query->getResult();
    $data['title'] = 'Kelola Role';

    return view('admin/edit_role', $data);
}




public function editRole()
{
    $db = \Config\Database::connect();

    // Ambil data user + role
$users = $db->table('users')
            ->select('users.id as user_id, users.username, users.email, groups.name as role_name')
            ->join('auth_groups_users', 'auth_groups_users.user_id = users.id', 'left')
            ->join('auth_groups as groups', 'groups.id = auth_groups_users.group_id', 'left')
            ->get()
            ->getResult();

    $data = [
        'title' => 'Edit Role User',
        'users' => $users
    ];

    return view('admin/edit_role', $data);
}

public function editRoleForm($id)
{
    $userModel  = new \Myth\Auth\Models\UserModel();
    $groupModel = new \Myth\Auth\Authorization\GroupModel();

    // Ambil data user
    $user = $userModel->find($id);

    if (!$user) {
        return redirect()->to('/admin/editRoleList')->with('error', 'User tidak ditemukan');
    }

    // Ambil group user saat ini
    $groups = $groupModel->getGroupsForUser($id);

    // Inject ke object user biar bisa dipakai di view
    $user->groups = array_map(function($g) {
        return $g['name'];
    }, $groups);

    $data = [
        'title' => 'Edit Role',
        'user'  => $user
    ];

    return view('admin/edit_role_form', $data);
}




public function updateRole($id)
{
    $groupModel = model(GroupModel::class);
    $role = $this->request->getPost('role');

    if (!$role) {
        return redirect()->back()->with('error', 'Role tidak boleh kosong!');
    }

    // Cari ID group berdasarkan nama
    $group = $groupModel->where('name', $role)->first();
    if (!$group) {
        return redirect()->back()->with('error', 'Role tidak valid!');
    }

    // Hapus semua role lama
    $groupModel->removeUserFromAllGroups($id);

    // Tambahkan role baru dengan group ID
    $groupModel->addUserToGroup($id, (int)$group->id);

    return redirect()->to('/admin/editRole')->with('success', 'Role berhasil diperbarui.');
}

}






