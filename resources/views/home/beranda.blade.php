@extends('master.app')

@section('content')
<style>
tr:nth-child(even)
   {background-color: #f2f2f2;}
</style>

<div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title"></h3>
          </div>
          <div class="box-body" style="
    padding-bottom: 470px;
">
            <h1 align="center">SELAMAT DATANG</h1>
            <img center src="{{ asset('admin/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image" style="display: block;margin: auto;padding-bottom:30px;padding-top:30px;width: 200px;">
        <table border="3" align="center">
        <tr class="table-active">
            <th style="
    width: 202px;
    height: 32px;text-align:center;
">NAMA :</th>
            <td style="
    width: 202px;
    height: 32px; text-align:center;
">{{auth()->user()->name}}</td>
        </tr>
        <tr>
            <th style="
    width: 202px;
    height: 32px;text-align:center;
">NIP :</th>
            <td style="
    width: 202px;
    height: 32px;text-align:center;
">{{auth()->user()->nip}}</td>
        </tr>
        <tr>
            <th style="
    width: 202px;
    height: 32px;text-align:center;
">JABATAN :</th>
            <td style="
    width: 202px;
    height: 32px;text-align:center;
">{{auth()->user()->jabatan}}</td>
        </tr>

        <table>
    </div>

@endsection