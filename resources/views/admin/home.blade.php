@extends('layouts.admin')

@auth
    @include('admin/productos')
@endauth

@guest
    @include('auth/'.'login')
@endguest