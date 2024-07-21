<!-- frontend.quiz_attempt.blade.php -->
<table class="table">
    <thead>
        <tr>
            <th>Sr No</th>
            <th>User Name</th>
            <th>Correct Score</th>
            <th>Incorrect Score</th>
            <th>Total Questions</th>
            <!-- Add more columns as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->user_name }}</td>
            <td>{{ $user->user_score['correct'] }}</td>
            <td>{{ $user->user_score['incorrect'] }}</td>
            <td>{{ $user->user_score['total_questions'] }}</td>
            <!-- Add more columns as needed -->
        </tr>
        @endforeach
    </tbody>
</table>