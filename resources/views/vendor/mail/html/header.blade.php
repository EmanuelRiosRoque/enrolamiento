@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
    <p>SISTEMA ENROLAMIENTO</p>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
