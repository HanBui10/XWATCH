<x-mail::message>
    Xin chào {{ Auth::user()->name }}!
    Xin cảm ơn bạn đã đặt hàng tại {{ config('app.name', 'Laravel') }}.<br>
    ## Thông tin giao hàng:<br>
    Điện thoại: **{{ $donhang->dienthoaigiaohang }}**<br>
    Địa chỉ giao hàng: **{{ $donhang->diachigiaohang }}**<br>
    ## Thông tin đơn hàng đã đặt:<br>
    <x-mail::table>
        <table>
            <tr>
                <th>#</th>
                <th>Sản phẩm</th>
                <th>SL</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
            </tr>
            @php $tongtien = 0; @endphp
            @foreach($donhang->DonHang_ChiTiet as $chitiet)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $chitiet->SanPham->tensanpham }}</td>
                <td>{{ $chitiet->soluongban }}</td>
                <td>{{ number_format($chitiet->dongiaban) }}đ</td>
                <td>{{ number_format($chitiet->soluongban * $chitiet->dongiaban) }}đ</td>
            </tr>
            @php $tongtien += $chitiet->soluongban * $chitiet->dongiaban; @endphp
            @endforeach
            <tr>
                <td colspan="4" style="text-align: right;"><strong>Tổng tiền:</strong></td>
                <td><strong>{{ number_format($tongtien) }}đ</strong></td>
            </tr>
        </table>
    </x-mail::table>
    Trân trọng,<br>
    {{ config('app.name', 'Laravel') }}
</x-mail::message>