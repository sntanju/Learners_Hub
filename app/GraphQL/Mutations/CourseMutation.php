namespace App\GraphQL\Mutations;

use App\Models\Course;

class CourseMutation
{
    public function create($root, array $args)
    {
        return Course::create([
            'name' => $args['name'],
            'description' => $args['description'],
            'teacher_id' => auth()->id(), // Assuming authenticated teacher
        ]);
    }
}
