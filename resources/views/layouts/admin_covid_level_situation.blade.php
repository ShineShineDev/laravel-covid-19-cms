@if(empty($level))
    <h4 class="text-dark">Level <strong class="badge badge-secondary" id="level">1</strong></h4>
    <h4 class="p-1">
        <div class="progress btn-at-white" style="height: 25px;">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary show-line" style="width: 25%">Level 1</div>
        </div>
        <div class="p-md-4 mt-4">
            <input type="range" id="slider2" class="w-100 btn-at-white" min="10"  value="10"  max="45" value="10" step="1" />
        </div>
    </h4>
    <span class="text-warning mt-0 pl-4">Drag and Drop</span>
@else
    <h4 class="text-dark">Level <strong class="badge badge-secondary" id="level">{{$level->level}}</strong></h4>
    <h4 class="p-1">
        <div class="progress btn-at-white" style="height: 25px;">
            <div class="progress-bar progress-bar-striped progress-bar-animated {{$level->bg}} show-line " role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: {{$level->width}}%">Level {{$level->level}}</div>
        </div>
        <div class="p-md-4 mt-4">
            <input type="range" id="slider1" class="w-100 btn-at-white" min="10"  value="{{$level->value}}"  max="45" value="10" step="1" />
        </div>
    </h4>
    <span class="text-warning mt-0 pl-4">Drag and Drop</span>
@endif

