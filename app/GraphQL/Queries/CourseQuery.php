namespace App\GraphQL\Queries;

use App\Models\Course;

class CourseQuery
{
    public function all()
    {
        return Course::all();
    }

    public function find($root, array $args)
    {
        return Course::findOrFail($args['id']);
    }
}
