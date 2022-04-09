@csrf
<div class="row">
    <div class="col">
        <label for="name">Fullname</label>
        <input type="text" class="form-control" id="name" name="name">
        <br>
        <label for="position">Position</label>
        <input type="text" class="form-control" id="position" name="position">
        <br>
        <label for="profile">Profile picture</label>
        <input type="file" class="form-control" accept="image/*" id="profile" name="profile"
            onchange="showPreview(event)">
        <br>
        <button class="btn btn-primary">Submit</button>
    </div>
    <div class="col">
        <img id="output">
    </div>
</div>

<script>
    function showPreview(event) {
        if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var output = document.getElementById("output");
            output.src = src;
            output.style.display = "block";
        }
    }
</script>
