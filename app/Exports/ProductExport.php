<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class ProductExport implements FromCollection, WithHeadings
{
    use Exportable;
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    public function collection()
    {
        $data = Product::all();
        $data->load('category');
        foreach ($data as $row) {
            $order[] = array(
                '0' => $row->name,

                '1' => $row->image,
                '2' => $row->price,
                '3' => $row->qty,
                '4' => $row->desc,
                '5' => $row->status,
                '6' => $row->category->company_name,
            );
        }

        return (collect($order));
    }

    // public function view(): View
    // {
    //     $data = Product::all();
    //     dd($data);
    //     $data->load('category');
    //     return view('admin.exports.product-export', [
    //         'products' =>  $data
    //     ]);
    // }
    public function headings(): array
    {
        return [
            'Tên',
            'Ảnh',
            'Giá',
            'Số lượng',
            'Mô tả',
            'Trạng thái',
            'Loại sản phẩm',
        ];
    }
}
