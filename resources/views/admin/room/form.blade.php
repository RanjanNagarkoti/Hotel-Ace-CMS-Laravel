<div class="form-group row">
    <label for="room-no" class="col-sm-2 col-form-label">Room No.</label>
    <div class="col-sm-10">
        {{ Form::number('room-no', null, ['class' => 'form-control', 'id' => 'room-no']) }}
    </div>
</div>

<div class="form-group row">
    <label for="type" class="col-sm-2 col-form-label">Room Type</label>
    <div class="col-sm-10">
        {{ Form::select('type', ['1' => 'Standard Room', '2' => 'Deluxe Room', '3' => 'Family Room', '4' => 'Single Room', '5' => 'Luxry Room'], null, ['class' => 'form-select', 'id' => 'type']) }}
    </div>
</div>

<div class="form-group row">
    <label for="capacity" class="col-sm-2 col-form-label">Room Capacity</label>
    <div class="col-sm-10">
        {{ Form::number('capacity', null, ['class' => 'form-control', 'id' => 'capacity']) }}
    </div>
</div>

<div class="form-group row">
    <label for="price" class="col-sm-2 col-form-label">Room Price</label>
    <div class="col-sm-10">
        {{ Form::number('price', null, ['class' => 'form-control', 'id' => 'price']) }}
    </div>
</div>

<div class="form-group row">
    <label for="status" class="col-sm-2 col-form-label">Status</label>
    <div class="col-sm-10">
        {!! Form::select('status', ['1' => 'Available', '2' => 'Booked'], null, ['class' => 'form-select', 'id' => 'status']) !!}
    </div>
</div>

<div class="form-group row">
    <label for="imgIn" class="col-sm-2 col-form-label">Image</label>
    <div class="col-sm-10">
        {!! Form::file('imgIn', ['accept' => 'image/*', 'id' => 'imgIn', 'class' => 'form-control', 'onchange' => 'showPreview(event);']) !!}
    </div>
</div>