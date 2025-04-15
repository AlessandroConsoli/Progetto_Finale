<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-4 pt-5">
                    {{__('ui.regNewAccount')}}
                </h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center height-custom">
            <div class="col-12 col-md-6">
                <form method="POST" action="{{route('register')}}" class="shadow rounded-2 p-5 bg-register">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('ui.entName')}}</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="registerEmail" class="form-label">{{__('ui.emailAddress')}}</label>
                        <input type="email" class="form-control" id="registerEmail" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">{{__('ui.password')}}</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">{{__('ui.passwordConfirmation')}}</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-dark">{{__('ui.register')}}</button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-center">
                <img src="/img/choose-1.jpg" alt="fashion style girl" class="register-img img-fluid">
            </div>
        </div>
    </div>    
</x-layout>