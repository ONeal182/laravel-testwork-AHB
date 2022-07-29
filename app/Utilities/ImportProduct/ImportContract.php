<?

namespace App\Utilities\ImportProduct;

interface ImportContract 
{
    public function parse(string $str_file, bool $showHeader): array;
    public function insertDb(array $data) : array;
}