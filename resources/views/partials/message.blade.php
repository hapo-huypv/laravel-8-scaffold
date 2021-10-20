<div class="d-flex justify-content-center">    
    @if(session('success'))
        <section id="alertSuccess" class="d-flex justify-content-center w-25 alert alert-success">{{session('success')}}</section>
    @endif

    @if(session('error'))
        <section id="alertError" class="d-flex justify-content-center w-25 alert alert-danger">{{session('error')}}</section>
    @endif
</div>