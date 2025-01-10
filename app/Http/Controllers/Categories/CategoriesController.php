<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Advantages;
use App\Models\Parameters;
use App\Models\AutoProducts;
use App\Models\Peculiarities;
use App\Models\Characteristics;
use App\Models\AutoCharacteristics;
use App\Models\AutoParameters;
use Illuminate\Support\Facades\Storage;


class CategoriesController extends Controller
{
    private const CATEGORIES_LIST_VIEW_NAME = 'admin.admin-all-product';
    private const CATEGORIES_EDIT_VIEW_NAME = 'admin.admin-add-product';
    public function create()
    {

    }
    public function listAdmin(Request $request)
    {
        if (Auth::check()) {
            $categories = Categories::all();
            return view(self::CATEGORIES_LIST_VIEW_NAME, ["categories" => $categories]);
        }
        return redirect('/');
    }
    public function viewAddForm(Request $request)
    {

        if (Auth::check()) {
            $type = (int) ($request->type ?? 1);
            $product = new Products;
            $product->theses = $product->theses ?? array_fill(0, 3, "");
            $product->machine_overview_designation = [];
            $product->advantages[] = new Advantages();
            $product->peculiarities[] = new Peculiarities();
            $characteristic = new Characteristics();
            $characteristic->parameters[] = new Parameters();
            $product->characteristics[] = $characteristic;
            $category = Categories::findOrFail($type);
            return view(self::CATEGORIES_EDIT_VIEW_NAME, ["category" => $category, "product" => $product]);
        }
        return redirect('/');
    }
    public function viewEditForm(Request $request, $id)
    {
        if (Auth::check()) {
            $product = Products::findOrFail($id);
            $category = $product->category;
            $product->machine_overview_designation = $product->machine_overview_designation ?? [];
            return view(self::CATEGORIES_EDIT_VIEW_NAME, ["category" => $category, "product" => $product]);
        }
        return redirect('/');
    }
    public function getProductRules()
    {
        return [
            "category_id" => ["integer"],
            "machine_name" => ['required', 'string'],
            "text_description" => ['string', "nullable"],
            "theses" => ['array', "nullable"],
            "upload_picture_machine" => ['file', "nullable"],
            "machine_overview_designation" => ['array', "nullable"],
            "advantages" => ['array', "nullable"],
            "peculiarity" => ['array', "nullable"],
            "characteristics" => ['array', "nullable"],
            "autoproducts" => ['array', "nullable"],
            "upload_picture_machine_view" => ['file', "nullable"],
        ];
    }
    public function add(Request $request)
    {

        if (Auth::check()) {
            try {
                $creditails = $request->validate($this->getProductRules());
                $creditails["created_at"] = now();

            } catch (\Exception $e) {
                dd($e);
            }
            $product = new Products();
            $this->saveProductService($product, $creditails);
            return redirect("/home");
        }
        return redirect('/');
    }
    public function saveProductService(Products $product, $creditails)
    {
        $product->name = $creditails["machine_name"];
        $product->categories_id = $creditails["category_id"];
        if (isset($creditails["created_at"])) {
            $product->created_at = $creditails["created_at"];
        }
        $product->description = $creditails["text_description"];
        $product->theses = $creditails["theses"];
        if (isset($creditails["upload_picture_machine"]) && $file = $creditails["upload_picture_machine"]) {
            $path = Storage::putFile('public/products', $file);
            $product->main_img = $path;
        }
        if (isset($creditails["machine_overview_designation"])) {
            $product->machine_overview_designation = $creditails["machine_overview_designation"];
        }
        if (isset($creditails["upload_picture_machine_view"]) && $file = $creditails["upload_picture_machine_view"]) {
            $path = Storage::putFile('public/products/view', $file);
            $product->machine_overview_designation_img = $path;
        }
        // dd($creditails["autoproducts"]);
        $product->save();
        $this->advantagesServise($product, $creditails);
        $this->peculiarityServise($product, $creditails);
        $this->characteristicsServise($product, $creditails);
        $this->autoproductsServise($product, $creditails);
        return $product;
    }
    public function autoproductsServise(Products $product, $creditails)
    {
        $arrayKeys = [];
        if (isset($creditails["autoproducts"])) {
            foreach ($creditails["autoproducts"] as $item) {
                if (isset($item["id"])) {
                    $autoproducts = Autoproducts::find($item["id"]);
                } else {
                    $autoproducts = new Autoproducts();
                }
                
                $autoproducts->name = $item["name"];
                $autoproducts->description = $item["description"] ?? "";
                $autoproducts->theses = $item["theses"] ;
                if (isset($item["main_img"]) && $file = $item["main_img"]) {
                    $path = Storage::putFile('public/autoproducts', $file);
                    $autoproducts->main_img = $path;
                }
                $autoproducts->product_id = $product->id;
                $autoproducts->save();
                $arrayKeys[] = $autoproducts->id;
                if (isset($item["autocharacteristics"])) {
                    $this->autoCharacteristicsServise($autoproducts, $item["autocharacteristics"]);
                }

            }
        }
        //dd($arrayKeys);
        if ($product->autoproducts) {
            foreach ($product->autoproducts as $item) {
                if (!in_array($item->id, $arrayKeys)) {
                    $item->delete();
                }
            }
        }
    }
    public function characteristicsServise(Products $product, $creditails)
    {
        $arrayKeys = [];
        if (isset($creditails["characteristics"])) {
            foreach ($creditails["characteristics"] as $item) {
                if (isset($item["id"])) {
                    $characteristics = Characteristics::find($item["id"]);
                } else {
                    $characteristics = new Characteristics();
                }
                $characteristics->product_id = $product->id;
                if (isset($item["name"])) {
                    $characteristics->name = $item["name"];
                }
                $characteristics->save();
                if (isset($item["parameters"])) {
                    foreach ($item["parameters"] as $parameter) {
                        if (isset($parameter["id"])) {
                            $parameterObj = Parameters::find($parameter["id"]);
                        } else {
                            $parameterObj = new Parameters();
                        }
                        $parameterObj->characteristic_id = $characteristics->id;
                        if (isset($parameter["value"])) {
                            $parameterObj->value = $parameter["value"];
                        }
                        if (isset($parameter["name"])) {
                            $parameterObj->name = $parameter["name"];
                        }
                        $parameterObj->save();
                        $arrayKeysParameter[] = $parameterObj->id;
                    }
                }
                if ($characteristics->parameters) {
                    foreach ($characteristics->parameters as $parameter) {
                        if (!in_array($parameter->id, $arrayKeysParameter)) {
                            $parameter->delete();
                        }
                    }
                }
                $arrayKeys[] = $characteristics->id;

            }
        }
        if ($product->characteristics) {
            foreach ($product->characteristics as $item) {

                if (!in_array($item->id, $arrayKeys)) {
                    $item->delete();
                }
            }
        }
    }
    public function autoCharacteristicsServise(AutoProducts $autoProduct, $creditails)
    {
        $arrayKeys = [];
        foreach ($creditails as $item) {
            if (isset($item["id"])) {
                $autoCharacteristics = AutoCharacteristics::find($item["id"]);
            } else {
                $autoCharacteristics = new AutoCharacteristics();
            }
            $autoCharacteristics->auto_product_id = $autoProduct->id;
            if (isset($item["name"])) {
                $autoCharacteristics->name = $item["name"];
            }
            $autoCharacteristics->save();
            $arrayKeys[] = $autoCharacteristics->id;
            if (isset($item["parameters"])) {
                foreach ($item["parameters"] as $parameter) {
                    if (isset($parameter["id"])) {
                        $parameterObj = AutoParameters::find($parameter["id"]);
                    } else {
                        $parameterObj = new AutoParameters();
                    }
                    $parameterObj->auto_characteristic_id = $autoCharacteristics->id;
                    if (isset($parameter["value"])) {
                        $parameterObj->value = $parameter["value"];
                    }
                    if (isset($parameter["name"])) {
                        $parameterObj->name = $parameter["name"];
                    }
                    $parameterObj->save();
                    $arrayKeysParameter[] = $parameterObj->id;
                }
            }
            if ($autoCharacteristics->autoparameters) {
                foreach ($autoCharacteristics->autoparameters as $parameter) {
                    if (!in_array($parameter->id, $arrayKeysParameter)) {
                        $parameter->delete();
                    }
                }
            }

        }
        if ($autoProduct->autocharacteristics) {
            foreach ($autoProduct->autocharacteristics as $item) {

                if (!in_array($item->id, $arrayKeys)) {
                    $item->delete();
                }
            }
        }
    }
    public function advantagesServise(Products $product, $creditails)
    {
        $arrayKeys = [];
        if (isset($creditails["advantages"])) {
            foreach ($creditails["advantages"] as $item) {
                if (isset($item["id"])) {
                    $advantages = Advantages::find($item["id"]);
                } else {
                    $advantages = new Advantages();
                }
                $advantages->product_id = $product->id;
                if (isset($item["name"])) {
                    $advantages->name = $item["name"];
                }
                if (isset($item["description"])) {
                    $advantages->description = $item["description"];
                }
                if (isset($item["file"]) && $file = $item["file"]) {
                    $path = Storage::putFile('public/products/view', $file);
                    $advantages->main_img = $path;
                }
                $advantages->save();
                $arrayKeys[] = $advantages->id;

            }
            if ($product->advantages) {
                foreach ($product->advantages as $item) {

                    if (!in_array($item->id, $arrayKeys)) {
                        $item->delete();
                    }
                }
            }
        }

    }
    public function peculiarityServise(Products $product, $creditails)
    {
        $arrayKeys = [];
        if (isset($creditails["peculiarity"])) {
            foreach ($creditails["peculiarity"] as $item) {
                if (isset($item["id"])) {
                    $peculiarity = Peculiarities::find($item["id"]);
                } else {
                    $peculiarity = new Peculiarities();
                }
                $peculiarity->product_id = $product->id;

                if (isset($item["name"])) {
                    $peculiarity->name = $item["name"];
                }
                if (isset($item["description"])) {
                    $peculiarity->description = $item["description"];
                }
                if (isset($item["file"]) && $file = $item["file"]) {
                    $path = Storage::putFile('public/products/view', $file);
                    $peculiarity->main_img = $path;
                }
                $peculiarity->save();
                $arrayKeys[] = $peculiarity->id;

            }
        }
        if ($product->peculiarities) {
            foreach ($product->peculiarities as $item) {

                if (!in_array($item->id, $arrayKeys)) {
                    $item->delete();
                }
            }
        }
    }
    public function edit(Request $request, $id)
    {
        if (Auth::check()) {
            try {
                $creditails = $request->validate($this->getProductRules());

            } catch (\Exception $e) {
                dd($e);

            }
            $product = Products::findOrFail($id);
            $this->saveProductService($product, $creditails);
            return redirect("/product-add/{$product->id}");
        }
        return redirect('/');
    }
    public function delete(Request $request)
    {
        $credentials = $request->validate([
            'id' => ['required', 'string'],
        ]);
        if (Auth::check()) {
            $newsId = $credentials["id"];
            $product = Products::findOrFail($newsId)->delete();

            return redirect("/home");
        }
        return redirect('/');
    }
}