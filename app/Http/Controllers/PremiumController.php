

namespace App\Http\Controllers;

use App\Models\Premium;
use Illuminate\Http\Request;

class PremiumController extends Controller
{
    public function index()
    {
        $premiums = Premium::paginate(8);
        return view('premium.index', compact('premiums')); // 👈 important
    }

    public function show($id)
    {
        $premium = Premium::findOrFail($id);
        return view('premium.show', compact('premium')); // 👈 important
    }
}
