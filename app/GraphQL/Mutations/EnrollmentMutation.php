namespace App\GraphQL\Mutations;

use App\Models\Enrollment;

class EnrollmentMutation
{
    public function enroll($root, array $args)
    {
        return Enrollment::create([
            'course_id' => $args['courseId'],
            'student_id' => auth()->id(), // Assuming authenticated student
        ]);
    }
}
