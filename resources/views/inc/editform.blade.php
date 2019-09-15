{{ csrf_field() }}

<div class="form-group">
    <label for="title">Title</label>
    <input name="title" id="title" class="form-control" type="text" placeholder="Title">
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" id="description" class="form-control" placeholder="Description"></textarea>
</div>

@isset($needImage)
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control-file" name="image" id="image">
    </div> 
@endisset
    

<div class="form-group">
    <input type="submit" value="Submit" class="btn btn-primary" >
</div>
        