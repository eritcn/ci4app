<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $auth = service('authorization');

        // Cek apakah sudah login
        if (!logged_in()) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Cek apakah user termasuk group admin
        if (!$auth->inGroup('admin', user_id())) {
            return redirect()->to('/')->with('error', 'Akses ditolak. Hanya admin yang bisa masuk!');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Kosongkan kalau tidak dipakai
    }
}

