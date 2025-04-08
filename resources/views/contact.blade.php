@extends('layout')

@section('content')
    <section style="width: 100%; display: flex; justify-content: center; margin-top: 100px">
        <div style="width: 20%; display: flex; flex-direction: column; align-items: center">
            <h1>Contact</h1>
            <form style="width: 100%; ;display: flex; flex-direction: column; gap : 15px">
                <div style="display: flex; flex-direction: column; gap : 10px">
                    <label for="">FullName :</label>
                    <input type="text">
                </div>
                <div style="display: flex; flex-direction: column; gap : 10px">
                    <label for="">Email :</label>
                    <input type="email">
                </div>
                <div style="display: flex; flex-direction: column; gap : 10px">
                    <label for="">Password :</label>
                    <input type="password">
                </div>
                <input type="submit" value="Create Account">
            </form>
        </div>
    </section>
@endsection