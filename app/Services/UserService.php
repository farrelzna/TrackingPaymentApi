<?php

namespace App\Services;

use App\Repositories\USerRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// logika bisnis di sini

class UserService
{
    private $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return $this->userRepository->getAllUser();
    }

    public function login(array $data)
    {
        $token = Auth::attempt($data);

        if (!$token) {
            return response()->json('Login gagal, silahkan cek email dan password anda', 401)->send();
            exit;
        }

        // jika attempt berhasi;
        $responseToken = [
            'acces_token' => $token, // token JWT
            'user' => Auth::user(), // data user
            'token_type' => 'Bearer'
        ];

        return $responseToken;
    }

    public function show($id)
    {
        return $this->userRepository->getSpecificUser($id);
    }

    public function showAuth()
    {
        return Auth::user();
    }

    public function store(array $data)
    {
        // 
        $data['password'] = Hash::make($data['password']);

        return $this->userRepository->storeNewUser($data);
    }

    public function update(array $data, $id)
    {
        return $this->userRepository->updateUser($data, $id);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json('Logout berhasil');
    }

    public function trash()
    {
        return $this->userRepository->getTrash();
    }

    public function destroy($id)
    {
        return $this->userRepository->deleteUser($id);
    }

    public function restore($id)
    {
        return $this->userRepository->restoreTrash($id);
    }

    public function permanentDelete($id)
    {
        return $this->userRepository->permanentDeleteTrash($id);
    }
}