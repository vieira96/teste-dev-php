<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarsController extends Controller
{
    public function getAllCars()
    {
        //Pega todos os carros do banco de dados.
        $cars = Car::all();

        //retorna os carros encontrados em formato json
        return response()->json([
            'cars' => $cars
        ]);
    }


    public function createCar(Request $request)
    {
        //criei o array com as regras para o validator
        $rules = [
            'modelo' => ['required'],
            'marca' => ['required'],
            'ano' => ['required', 'date'],
        ];
        //criei um array com as mensagens customizadas para passar para o validator
        $messages = [
            'marca.required' => 'O campo marca é obrigatório',
            'modelo.required' => 'O campo modelo é obrigatório',
            'ano.required' => 'O campo ano é obrigatório',
            'ano.date' => 'A data não está em um formato válido',
        ];

        //iniciei o validator passando todos os dados do request
        //e tambem passei as regras e a mensagem customizada para o validator
        $validator = Validator::make($request->all(), $rules, $messages);
        
        //Verifico se aconteceu algum erro, se sim, retorna uma resposta com o primeiro erro ocorrido.
        if($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first()
            ]);
        }

        //Se não acorrer nenhum erro...
        
        //crio um novo carro e logo em seguida salvo ele no banco.
        $new_car = new Car();
        $new_car->marca = $request->input('marca');
        $new_car->modelo = $request->input('modelo');
        $new_car->ano = $request->input('ano');
        $new_car->save();

        //retorno para o front-end uma mensagem de sucesso
        return response()->json([
            'success' => 'Novo carro criado com sucesso'
        ]);
    }

    public function getCarById($id) {

        //peguei a informação do carro
        $car = Car::find($id);

        //retornei as informações do carro para o front
        if($car) {
            return response()->json([
                'car' => $car
            ]);
        } else {
            return response()->json([
                'error' => 'Nenhum carro encontrado com esse ID'
            ]);
        }
    }

    public function updateCar($id, Request $request) {
        $car = Car::find($id);

        //criei o array com as regras para o validator
        $rules = [
            'marca' => ['required'],
            'modelo' => ['required'],
            'ano' => ['required', 'date'],
        ];
        //criei um array com as mensagens customizadas para passar para o validator
        $messages = [
            'marca.required' => 'O campo marca é obrigatório',
            'modelo.required' => 'O campo modelo é obrigatório',
            'ano.required' => 'O campo ano é obrigatório',
            'ano.date' => 'A data não está em um formato válido',
        ];

        //iniciei o validator passando todos os dados do request
        //e tambem passei as regras e a mensagem customizada para o validator
        $validator = Validator::make($request->all(), $rules, $messages);
        
        //Verifico se aconteceu algum erro, se sim, retorna uma resposta com o primeiro erro ocorrido.
        if($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first()
            ]);
        }

        //salvei os novos dados no banco
        $car->marca = $request->input('marca');
        $car->modelo = $request->input('modelo');
        $car->ano = $request->input('ano');
        $car->save();

        return response()->json([
            'success' => 'Carro atualizado com sucesso.'
        ]);
    }

    public function deleteCar($id) 
    {
        $car = Car::find($id);

        //verifico se algum carro foi encontrado
        if(!$car) {
            return response()->json([
                'error' => 'Nenhum carro encontrado com esse ID.'
            ]);
        }
        //deleto o carro encontrado
        $car->delete();

        return response()->json([
            'success' => 'Carro deletado com sucesso.'
        ]);

    }
}
