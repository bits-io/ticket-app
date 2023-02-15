@if(session()->has('error'))
    <p class="alert alert-danger mb-lg-5 mt-lg-5"> {{ session()->get('error') }}</p>
@endif
@if(session()->has('success'))
    <p class="alert alert-success mb-lg-5 mt-lg-5"> {{ session()->get('success') }}</p>
@endif
