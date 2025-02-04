namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function assignRole(Request $request)
    {
        $user = User::find($request->user_id);
        if ($user) {
            $user->role = 'admin'; // Asignar el rol de administrador
            $user->save();
            return redirect()->back()->with('success', 'Rol asignado correctamente.');
        }
        return redirect()->back()->with('error', 'Usuario no encontrado.');
    }
}
