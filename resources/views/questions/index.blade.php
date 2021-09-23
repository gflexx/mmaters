@extends('layouts.app')

@section('content')

<div class="quiz">
    <h5 class="text-center">Mental Health Questions</h5>
    <div class="row justify-content-center">
            <div class="col-9">
                <form action="" method="post">
                    @csrf
                    <div class="mb-2 p-3">
                        <label for="category">1.  What Mental health problem are you Facing?</label>
                        <select name="category" id="category" class="form-select" required>
                            <option value="none">--None</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                            <option value="otner">--Other</option>
                        </select>
                        
                        @error('category')
                            <p class="text-muted">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-2 p-3">
                        <label for="history">2.  Have you ever had any mental illness before?</label>
                        
                        
                        @error('history')
                            <p class="text-muted">{{ $message }}</p>
                        @enderror
                    </div>

                </form>
            </div>
    </div>

</div>

@endsection