<!---
 * Created by PhpStorm.
 * User: Shine Shine
 * Date: 12/15/2021
 * Time: 1:14 AM
 *-->
@if(!empty($level))
    <div class="pl-3 pr-3 pl-md-5 pr-md-5">
        <div class="progress btn-at-white" style="height: 25px;">
            <div class="progress-bar progress-bar-striped progress-bar-animated {{$level->bg}} show-line" style="width: {{$level->width}}%">Level {{$level->level}}</div>
        </div>
    </div>
@endif

