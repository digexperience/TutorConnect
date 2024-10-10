<div class="modal fade" id="uploadpicture">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Upload Profile</b></h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex flex-column align-items-center">
                <form method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group text-center">
                        <img class="rounded-circle mt-5" width="150px" height="150px" id="profile" @if ($user->image == "") src="assets/images/profile.jpg" @elseif ($user->image !== "") src="assets/images/{{$user->image}}" @endif alt="Profile">
                    </div>
                    <div class="form-group col-md-12 text-center">
                        <label for="image" class="col-form-label">Profile Picture</label>
                        <input type="file" class="form-control" name="image" id="image" accept="image/gif, image/jpeg, image/png" onchange="readURL(this);" @error('image') is-invalid @enderror required>
                    </div>
                    <div class="form-group text-center mt-4">
                        <button type="submit" class="btn btn-success waves-effect waves-light">
                            Upload
                        </button>
                        <button type="reset" class="btn btn-danger waves-effect m-l-5" data-dismiss="modal">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
            $('#profile').attr('src', e.target.result).width(150).height(150);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>