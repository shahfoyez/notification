@include("shared/header")
    <div class="container foy-container mt-5">
        <div class="foy-inner-container">
            <form action="{{ url('/order') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName">Order Name</label>
                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your Name with anyone else.</small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@include("shared/footer")
