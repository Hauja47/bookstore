<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Book
 *
 * @property int $id
 * @property int $category_id
 * @property string $author
 * @property string $publish_year
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @property-read \App\Models\Product|null $product
 * @method static \Database\Factories\BookFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Book newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Book newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Book query()
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book wherePublishYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereUpdatedAt($value)
 */
	class Book extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Brand
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $product
 * @property-read int|null $product_count
 * @method static \Database\Factories\BrandFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand query()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereUpdatedAt($value)
 */
	class Brand extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Book[] $product
 * @property-read int|null $product_count
 * @method static \Database\Factories\CategoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Customer
 *
 * @property int $id
 * @property string $full_name
 * @property string $phone_number
 * @property string $email
 * @property string $address
 * @property int $debt
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Invoice[] $invoices
 * @property-read int|null $invoices_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payment[] $payments
 * @property-read int|null $payments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Receipt[] $receipts
 * @property-read int|null $receipts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ReturnGoodsReceipt[] $returnGoodsReceipts
 * @property-read int|null $return_goods_receipts_count
 * @method static \Database\Factories\CustomerFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereDebt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereUpdatedAt($value)
 */
	class Customer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Employee
 *
 * @property int $id
 * @property string $full_name
 * @property string|null $photo
 * @property string $phone_number
 * @property string $email
 * @property string $address
 * @property int $is_working
 * @property int $salary
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\GoodsReceipt[] $goodsReceipts
 * @property-read int|null $goods_receipts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Invoice[] $invoices
 * @property-read int|null $invoices_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payment[] $paymentReceiver
 * @property-read int|null $payment_receiver_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payment[] $payments
 * @property-read int|null $payments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Receipt[] $receiptGiver
 * @property-read int|null $receipt_giver_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Receipt[] $receipts
 * @property-read int|null $receipts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ReturnGoodsReceipt[] $returnGoodsReceipts
 * @property-read int|null $return_goods_receipts_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\EmployeeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereIsWorking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUserId($value)
 */
	class Employee extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\GoodsReceipt
 *
 * @property int $id
 * @property int $employee_id
 * @property int $provider_id
 * @property int $total_price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\GoodsReceiptDetail[] $details
 * @property-read int|null $details_count
 * @property-read \App\Models\Employee $employee
 * @property-read \App\Models\Provider $provider
 * @method static \Database\Factories\GoodsReceiptFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|GoodsReceipt newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GoodsReceipt newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GoodsReceipt query()
 * @method static \Illuminate\Database\Eloquent\Builder|GoodsReceipt whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GoodsReceipt whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GoodsReceipt whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GoodsReceipt whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GoodsReceipt whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GoodsReceipt whereUpdatedAt($value)
 */
	class GoodsReceipt extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\GoodsReceiptDetail
 *
 * @property int $id
 * @property int $goods_receipt_id
 * @property int $product_id
 * @property int $quantity
 * @property int $cost
 * @property int $total
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\GoodsReceipt $goodsReceipt
 * @property-read \App\Models\Product $product
 * @method static \Database\Factories\GoodsReceiptDetailFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|GoodsReceiptDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GoodsReceiptDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GoodsReceiptDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|GoodsReceiptDetail whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GoodsReceiptDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GoodsReceiptDetail whereGoodsReceiptId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GoodsReceiptDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GoodsReceiptDetail whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GoodsReceiptDetail whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GoodsReceiptDetail whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GoodsReceiptDetail whereUpdatedAt($value)
 */
	class GoodsReceiptDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Invoice
 *
 * @property int $id
 * @property int $customer_id
 * @property int $employee_id
 * @property int $total
 * @property int $paid
 * @property int $balance
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Customer $customer
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\InvoiceDetail[] $details
 * @property-read int|null $details_count
 * @property-read \App\Models\Employee $employee
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\GoodsReceipt[] $goodsReceipt
 * @property-read int|null $goods_receipt_count
 * @method static \Database\Factories\InvoiceFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice query()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice wherePaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereUpdatedAt($value)
 */
	class Invoice extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\InvoiceDetail
 *
 * @property int $id
 * @property int $invoice_id
 * @property int $product_id
 * @property int $quantity
 * @property int $cost
 * @property int $total
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Invoice $invoice
 * @property-read \App\Models\Product $product
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ReturnGoodsReceiptDetail[] $returnGoodsDetails
 * @property-read int|null $return_goods_details_count
 * @method static \Database\Factories\InvoiceDetailFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceDetail whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceDetail whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceDetail whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceDetail whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceDetail whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceDetail whereUpdatedAt($value)
 */
	class InvoiceDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Parameter
 *
 * @property int $id
 * @property string $name
 * @property int $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Parameter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Parameter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Parameter query()
 * @method static \Illuminate\Database\Eloquent\Builder|Parameter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parameter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parameter whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parameter whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parameter whereValue($value)
 */
	class Parameter extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Payment
 *
 * @property int $id
 * @property int $payment_type_id
 * @property string $receiver_type
 * @property int $receiver_id
 * @property int $payment_method_id
 * @property int $employee_id
 * @property int $money
 * @property string|null $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\PaymentMethod $paymentMethod
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $receiver
 * @property-read \App\Models\PaymentType $type
 * @method static \Database\Factories\PaymentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePaymentMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePaymentTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereReceiverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereReceiverType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUpdatedAt($value)
 */
	class Payment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PaymentMethod
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payment[] $payments
 * @property-read int|null $payments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Receipt[] $receipts
 * @property-read int|null $receipts_count
 * @method static \Database\Factories\PaymentMethodFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereUpdatedAt($value)
 */
	class PaymentMethod extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PaymentType
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payment[] $payments
 * @property-read int|null $payments_count
 * @method static \Database\Factories\PaymentTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentType query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentType whereUpdatedAt($value)
 */
	class PaymentType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $name
 * @property string $productable_type
 * @property int $productable_id
 * @property string|null $photo
 * @property int $brand_id
 * @property string $version
 * @property int $in_stock
 * @property int $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Brand $brand
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\GoodsReceipt[] $goodsReceipt
 * @property-read int|null $goods_receipt_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Invoice[] $invoices
 * @property-read int|null $invoices_count
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $productable
 * @method static \Database\Factories\ProductFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereInStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereVersion($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductType
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @method static \Database\Factories\ProductTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType whereUpdatedAt($value)
 */
	class ProductType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Provider
 *
 * @property int $id
 * @property string $name
 * @property string $phone_number
 * @property string $email
 * @property string $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\GoodsReceipt[] $goodsReceipt
 * @property-read int|null $goods_receipt_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payment[] $payments
 * @property-read int|null $payments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Receipt[] $receipts
 * @property-read int|null $receipts_count
 * @method static \Database\Factories\ProviderFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Provider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Provider query()
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereUpdatedAt($value)
 */
	class Provider extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Receipt
 *
 * @property int $id
 * @property int $receipt_type_id
 * @property string $giver_type
 * @property int $giver_id
 * @property int $payment_method_id
 * @property int $employee_id
 * @property int $money
 * @property string|null $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Customer $employee
 * @property-read \App\Models\PaymentMethod $paymentMethod
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $receiver
 * @property-read \App\Models\ReceiptType $type
 * @method static \Database\Factories\ReceiptFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Receipt newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Receipt newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Receipt query()
 * @method static \Illuminate\Database\Eloquent\Builder|Receipt whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Receipt whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Receipt whereGiverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Receipt whereGiverType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Receipt whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Receipt whereMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Receipt whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Receipt wherePaymentMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Receipt whereReceiptTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Receipt whereUpdatedAt($value)
 */
	class Receipt extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ReceiptType
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Receipt[] $receipt
 * @property-read int|null $receipt_count
 * @method static \Database\Factories\ReceiptTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ReceiptType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReceiptType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReceiptType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ReceiptType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReceiptType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReceiptType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReceiptType whereUpdatedAt($value)
 */
	class ReceiptType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ReturnGoodsReceipt
 *
 * @property int $id
 * @property int $invoice_id
 * @property int $customer_id
 * @property int $employee_id
 * @property int $total
 * @property string|null $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Customer $customer
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ReturnGoodsReceiptDetail[] $details
 * @property-read int|null $details_count
 * @property-read \App\Models\Employee $employee
 * @property-read \App\Models\Invoice $invoice
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnGoodsReceipt newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnGoodsReceipt newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnGoodsReceipt query()
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnGoodsReceipt whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnGoodsReceipt whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnGoodsReceipt whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnGoodsReceipt whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnGoodsReceipt whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnGoodsReceipt whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnGoodsReceipt whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnGoodsReceipt whereUpdatedAt($value)
 */
	class ReturnGoodsReceipt extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ReturnGoodsReceiptDetail
 *
 * @property int $id
 * @property int $return_goods_receipt_id
 * @property int $invoice_detail_id
 * @property int $product_id
 * @property int $number
 * @property int $cost
 * @property int $total
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\InvoiceDetail $invoiceDetail
 * @property-read \App\Models\Product|null $product
 * @property-read \App\Models\ReturnGoodsReceipt $returnGoodsReceipts
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnGoodsReceiptDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnGoodsReceiptDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnGoodsReceiptDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnGoodsReceiptDetail whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnGoodsReceiptDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnGoodsReceiptDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnGoodsReceiptDetail whereInvoiceDetailId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnGoodsReceiptDetail whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnGoodsReceiptDetail whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnGoodsReceiptDetail whereReturnGoodsReceiptId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnGoodsReceiptDetail whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturnGoodsReceiptDetail whereUpdatedAt($value)
 */
	class ReturnGoodsReceiptDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Stationery
 *
 * @property int $id
 * @property string $material
 * @property string $color
 * @property string $origin
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product|null $product
 * @method static \Database\Factories\StationeryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Stationery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stationery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stationery query()
 * @method static \Illuminate\Database\Eloquent\Builder|Stationery whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stationery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stationery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stationery whereMaterial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stationery whereOrigin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stationery whereUpdatedAt($value)
 */
	class Stationery extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $role
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Employee|null $employee
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 */
	class User extends \Eloquent {}
}

