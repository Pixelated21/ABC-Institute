<div>
    <x-Table.table :button="false" title="Schedule">

        <x-slot name="thead">
            <x-Table.table-row>
                <x-Table.table-cell title="Subject"/>
{{--                <x-Table.table-cell title="Day"/>--}}
{{--                <x-Table.table-cell title="Time"/>--}}
            </x-Table.table-row>
        </x-slot>

        <x-slot name="tbody">
            @forelse($schedules as $schedule)
                <x-Table.table-row>
                    <x-Table.table-cell :title="$schedule->course->course_nm"/>
                    <x-Table.table-cell :title="$schedule->course->teacherAssignment[0]->days"/>
                    <x-Table.table-cell :title="$schedule->course->teacherAssignment[0]->start.' - '.$schedule->course->teacherAssignment[0]->end"/>
                </x-Table.table-row>
            @empty
                <x-Table.table-row>
                    <x-Table.table-cell colspan="3" class="text-lg" title="No Data Available"/>
                </x-Table.table-row>
            @endforelse

        </x-slot>
    </x-Table.table>
</div>
