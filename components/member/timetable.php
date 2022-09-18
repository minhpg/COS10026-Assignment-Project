
<script>
    timetable_span = timetable.map((day) => {
        const {
            sessions
        } = day
        if (sessions) {
            return sessions.map(session => {
                return session.span
            }).reduce((a, b) => a + b, 0) / 30
        }
    })
    timetable_span.map((value, index) => {
        timetable[index].total_span = value
    })

    sorted_timetable = timetable_span.sort(function(a, b) {
        if (a === Infinity)
            return 1;
        else if (isNaN(a))
            return -1;
        else
            return b - a;
    });
    largest_span = sorted_timetable[0]


    const timeConvert = (n) => {
        const num = n;
        const hours = (num / 60);
        const rhours = Math.floor(hours);
        const minutes = (hours - rhours) * 60;
        const rminutes = Math.round(minutes);
        return `${rhours}:${rminutes || '00'}`
    }
</script>
<table class="w-full table table-compact timetable" x-data="{ timetable, largest_span }">
    <tbody>
        <tr>
            <th class="w-5 h-10"></th>
            <template x-for="i in largest_span">
                <th colspan="1" x-html="timeConvert((i+(8*2))/2*60)" class="w-5 h-10 bg-base-200"></th>
            </template>
        </tr>
        <template x-for="day in timetable">
            <tr>
                <th x-html="day.day" class="w-10 bg-base-200"></th>
                <template x-for="session in day.sessions">
                    <td x-show="session" :colspan="session.span/30" class="w-5 h-10" :class="session.course ? `${session.course}` : ''">
                        <p x-html="session.course ? session.course : ''" class="font-bold"></p>
                        <p x-html="session.course ? session.type : ''"></p>
                    </td>
                </template>
                <template x-for="session in (largest_span - day.total_span)">
                    <td class="w-5 h-10"></td>
                </template>
            </tr>
        </template>
    </tbody>
</table>