@if(session('success'))
    <section id="alertSuccess" class='alert alert-success'>{{session('success')}}</section>
@endif

@if(session('error'))
    <section id="alertError" class='alert alert-danger'>{{session('error')}}</section>
@endif
