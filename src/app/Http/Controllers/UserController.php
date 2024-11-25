<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
   public function index()
   {
      $users = User::all();
      return response()->json($users);
   }

   public function show($id)
   {
      $user = User::find($id);
      if ($user) {
         return response()->json($user);
      }
      return response()->json(['error' => 'User not found'], 404);
   }

   public function store(Request $request)
   {
      
      // $request->validate([
      //    'name' => 'required|string|max:255',
      //    'email' => 'required|string|email|max:255|unique:users',
      //    'password' => 'required|string|min:8|confirmed',
      // ]);

      $user = User::create([
         'name' => $request->name,
         'email' => $request->email,
         'role' => $request->role,
         'course' => $request->course,  
         'password' => Hash::make($request->password),
      ]);

      return response()->json($user, 201);
   }

   public function update(Request $request, $id)
   {
      $user = User::find($id);
      if (!$user) {
          return response()->json(['error' => 'User not found'], 404);
      }
  
      try {
          $request->validate([
              'name' => 'sometimes|required|string|max:255',
              'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $id,
              'password' => 'sometimes|required|string|min:8|confirmed',
              'role' => 'sometimes|required|in:ESTUDANTE,PROFESSOR,ADMINISTRADOR',
              'course' => 'sometimes|required|in:DIREITO,SISTEMAS,PSICOLOGIA,PEDAGOGIA',
          ]);
      } catch (\Illuminate\Validation\ValidationException $e) {
          return response()->json(['error' => 'Validation error', 'messages' => $e->errors()], 404);
      }
  
      if ($request->has('name')) {
          $user->name = $request->name;
      }
      if ($request->has('email')) {
          $user->email = $request->email;
      }
      if ($request->has('role')) {
          $user->role = $request->role;
      }
      if ($request->has('course')) {
          $user->course = $request->course;
      }
      if ($request->has('password')) {
          $user->password = Hash::make($request->password);
      }
  
      $user->save();
  
      return response()->json($user);
  }

   public function destroy($id)
   {
      $user = User::find($id);
      if ($user) {
         $user->delete();
         return response()->json(['message' => 'User deleted successfully']);
      }
      return response()->json(['error' => 'User not found'], 404);
   }
}
