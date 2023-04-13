<div class="container md">
    <form action="">
        <div class="row">
            <div class="col-6">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
            </div>
            <div class="col-6">
                <label for="names" class="form-label">Full Names</label>
                <input type="text" class="form-control" id="names" placeholder="John Doe">
            </div>
            <div class="col-6">
                <label for="formFile" class="form-label">Upload image</label>
                <input class="form-control" type="file" id="formFile">
            </div>
            <div class="col-6 mb-3">
                <label for="formFile" class="form-label">Select country</label>
                <select class="form-select" aria-label="Default select example">
                <option selected>Country</option>
                <option value="1">Kenya</option>
                <option value="2">Uganda</option>
                <option value="3">Burundi</option>
                </select>
            </div>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
