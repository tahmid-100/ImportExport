@extends('layouts.userMaster')

@section('title', 'Profile')

@section('content')
<div class="container">
    <h1>Profile Page</h1>
    <div class="card">
        <!-- Display Profile Image -->
        <div>
            @if(auth()->user()->image)
                <img src="{{ asset('images/' . auth()->user()->image) }}" alt="Profile Image" style="width:150px; height:150px; border-radius:50%;">
            @else
                <p>No Image Chosen</p>
            @endif
        </div>

        <!-- Update Image -->
        <form action="{{ route('profile.updateImage') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label for="image">Profile Image:</label>
                <input type="file" id="image" name="image">
                <button type="submit">Update Image</button>
            </div>
        </form>
        
        <h2>Update Profile Information</h2>

        <!-- Display Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <!-- Update Name -->
        <form action="{{ route('profile.updateName') }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ auth()->user()->name }}">
                <button type="submit">Update Name</button>
            </div>
        </form>

        <!-- Update Email -->
        <form action="{{ route('profile.updateEmail') }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ auth()->user()->email }}">
                <button type="submit">Update Email</button>
            </div>
        </form>

        <!-- Update Password -->
        <form action="{{ route('profile.updatePassword') }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password"  placeholder="Enter new password">
                <button type="submit">Update Password</button>
            </div>
        </form>

        <!-- Update Phone -->
        <form action="{{ route('profile.updatePhone') }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" value="{{ auth()->user()->phone ?? '' }}" placeholder="{{ auth()->user()->phone ? '' : 'Add phone' }}">
                <button type="submit">Update Phone</button>
            </div>
        </form>
    </div>
</div>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    transition: background-color 0.3s, color 0.3s;
}
body.dark-mode {
    background-color: #333;
    color: #f4f4f4;
}
nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #333;
    padding: 10px 20px;
}
nav a {
    color: white;
    padding: 14px 20px;
    text-decoration: none;
    text-align: center;
}
nav a:hover {
    background-color: #ddd;
    color: black;
}
.nav-links {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
}
.header-buttons {
    display: flex;
    gap: 10px;
}
.header-buttons button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 15px;
    cursor: pointer;
    font-size: 1rem;
    display: flex;
    align-items: center;
    gap: 5px;
    border-radius: 5px;
    transition: background-color 0.3s;
}
.header-buttons button:hover {
    background-color: #45a049;
}
.container {
    max-width: 800px;
    margin: 20px auto;
    overflow: hidden;
    padding: 0 20px;
}
.card {
    background-color: white;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin: 20px 0;
    padding: 20px;
    transition: background-color 0.3s, color 0.3s;
}
.card.dark-mode {
    background-color: #444;
    color: #f4f4f4;
}
.card h2 {
    margin-top: 0;
}
.card div {
    margin-bottom: 15px;
}
.card label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}
.card input[type="text"],
.card input[type="email"],
.card input[type="password"],
.card input[type="file"] {
    width: calc(100% - 100px);
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
.card button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}
.card button:hover {
    background-color: #45a049;
}
.alert {
    padding: 10px;
    color: white;
    background-color: #4CAF50;
    border-radius: 5px;
    margin-bottom: 15px;
}
.alert.alert-success {
    background-color: #4CAF50;
}
img {
    display: block;
    margin: 0 auto 20px;
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
}
p {
    text-align: center;
    color: #999;
}

</style>
@endsection
