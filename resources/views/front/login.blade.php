@extends('front.layout')

@section('title', 'Login | E-Tiketing')

@section('content')
<div class="container-xxl appointment py-5 wow fadeIn" data-wow-delay="0.1s">
  <div class="container py-5">
    <div class="bg-white rounded p-5 w-75 wow fadeIn mb-5" data-wow-delay="0.5s">
      <h1 class="display-6 text-dark mb-3">
        Login | E-Tiketing
      </h1>
      <p class="text-body mb-5">
        Masukan username dan password untuk melanjutkan.
      </p>
      <form>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="phone" placeholder="Masukan nomor telepon" />
          <label for="phone">No. Telepon</label>
        </div>
        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="password" placeholder="Masukan password" />
          <label for="password">Password</label>
        </div>
        {{-- <div class="form-floating">
          <textarea class="form-control" placeholder="Leave a message here" id="message"
            style="height: 80px"></textarea>
          <label for="message">Message</label>
        </div> --}}
        <div class="text-end">
          <button class="btn btn-primary py-3 px-5" type="submit">
            Masuk
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Appointment End -->
@endsection