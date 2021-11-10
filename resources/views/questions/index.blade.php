@extends('layouts.app')

@section('content')

<style>
    .hidden{
        display: none;
    }
</style>

<div class="quiz">
    <h5 class="text-center">Mental Health Questions</h5>
    <div class="row justify-content-center">
            <div class="col-9">
                <form action="{{ route('show_answers') }}" method="post">
                    @csrf
                    <div class="mb-1 p-2">
                        <label for="category">What Mental health problem are you Facing?</label>
                        <select name="category" id="category" class="form-select" required>
                            <option value="none">--None</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                            <option value="other">--Other</option>
                        </select>

                        @error('category')
                            <p class="text-muted">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-1 p-2">
                        <div class="form-check form-switch large">
                            <input class="form-check-input" name="history" type="checkbox" id="history" onchange="hideUnhide(this)">
                            <label class="form-check-label" for="history">Have you ever had any mental illness before?</label>
                        </div>
                    </div>

                    <div id="hideable" class="hidden">
                        <div class="mb-1 p-2">
                            <label for="history-description">What was it?</label>
                            <textarea name="history_description" id="history-description" class="form-control" rows="1"></textarea>
                            @error('history_description')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-1 p-2">
                            <label class="form-check-label">Did you heal?</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="did_heal" id="inlineRadio1" value="1">
                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="did_heal" id="inlineRadio2" value="0" checked>
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 p-2">
                        <label for="history-description">What other topics on mental health issues do wish to learn more about?</label>
                        <textarea name="other_topics" id="other-topics" class="form-control" rows="1"></textarea>
                        @error('other-topics')
                            <p class="text-muted">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-secondary">Submit</button>
                    </div>

                </form>
            </div>
    </div>

</div>

<script>
    var hideable = document.getElementById('hideable');

    function hideUnhide(history){
        if (history.checked){
            hideable.classList.remove('hidden');
        } else {
            hideable.classList.add('hidden');
        }
    }

</script>

@endsection
