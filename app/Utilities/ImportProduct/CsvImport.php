<?

namespace App\Utilities\ImportProduct;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use App\Utilities\ImportProduct\ImportContract;

class CsvImport implements ImportContract
{
    public function parse(string $content_file, bool $showHeader = false): array
    {

        $file = Storage::get($content_file);
        $file = preg_replace("/[\,]{2,}|[\"]{2,}| {2,}|\r/i", "", $file);
        $file = preg_replace('/\,"/', ",", $file);
        $file = preg_replace('/\; /', " ", $file);
        $file = preg_replace('/\"\n/', "\n", $file);
        $file = str_replace('\\','', $file);
        
        // dd($file);
        
        $rows = explode(PHP_EOL, $file);
        $data = [];
        
        foreach ($rows as $row) {
            $data[] = explode(';', $row);
        }
        if($showHeader !== true){
            unset($data[0]);
        }
        // dd($data[1]);

        return $data;
    }

    public function insertDb(array $data) : array
    {
        $array_key = [
            'code', 'name', 'lvl_1', 'lvl_2', 'lvl_3', 'price', 'priceSP', 'count', 'properties', 'purchases', 'unit', 'image', 'on_main_page', 'description'
        ];

        $new_arry = [];
        $status = ['update' => 0, 'create' => 0];
        foreach ($data as $key => $items) {
            
            foreach ($items as $key_index => $items) {
                $new_arry[$key][$array_key[$key_index]] = $items;
            }
            $new_arry[$key]['description'] = preg_replace("/[\r\n]/", '', $new_arry[$key]['description']);
            $product = Product::updateOrCreate(['code' => $new_arry[$key]['code']], $new_arry[$key])->wasRecentlyCreated;
            // dd($new_arry[$key]);
            if($product === true){
                $status['create']++;
            }else{
                $status['update']++;
            }

        }
        return $status;
    }
}
