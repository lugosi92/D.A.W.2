<!-- 
Realizar una clase Empresa implementada mediante un array de objetos de la clase Empleado 
que hereda de la clase Persona. La clase Empresa cuenta con las variables nombre de la empresa, 
representante_legal, CIF, dirección, localidad, código_postal, país y número de empleados. 
Definir los principales métodos de la clase Empresa (constructor, set, get y visualizar).  
La clase Empresa tendrá además los siguientes métodos: 
- Añade_empleado (antigüedad 0, sueldo 1.800 euros) 
- Elimina_empleado (elimina un empleado a partir del  NIF) 
- Visualiza_empleados (visualiza los datos de todos los empleados ordenados alfabéticamente) 
- Mas_antiguos (visualiza los datos del empleado con más antigüedad) 
- Menos_antiguos (visualiza los datos de los empleados con menos antigüedad)
- Sueldo_medio (obtiene y visualiza el sueldo medio de todos los empleados de la empresa) 
- Antigüedad_media (obtiene y visualiza la antigüedad media de los empleados en la empresa.
-  Pagan_impuestos_extra (visualiza los nombres y apellidos de los empleados cuyos sueldos superan los 3.000 euros. 
El listado debe aparecer ordenado por sueldo descendentemente

-->


<?php
class Empresa
{
    private $nombre;
    private $represante_legal;
    private $CIF;
    private $direccion;
    private $localidad;
    private $codigo_postal;
    private $pais;
    private $empleados;
    private $numero_de_empleados;

    public function __construct(
        $nombre,
        $represante_legal,
        $CIF,
        $direccion,
        $localidad,
        $codigo_postal,
        $pais,
        $empleados,
    ) {
        $this->nombre = $nombre;
        $this->represante_legal = $represante_legal;
        $this->CIF = $CIF;
        $this->direccion = $direccion;
        $this->localidad = $localidad;
        $this->codigo_postal = $codigo_postal;
        $this->pais = $pais;
        $this->empleados = $empleados;
    }

    // Getters
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getRepresanteLegal()
    {
        return $this->represante_legal;
    }

    public function getCIF()
    {
        return $this->CIF;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getLocalidad()
    {
        return $this->localidad;
    }

    public function getCodigoPostal()
    {
        return $this->codigo_postal;
    }

    public function getPais()
    {
        return $this->pais;
    }

    public function getEmpleados()
    {
        return $this->empleados;
    }
    // Setters
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setRepresanteLegal($represante_legal)
    {
        $this->represante_legal = $represante_legal;
    }

    public function setCIF($CIF)
    {
        $this->CIF = $CIF;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;
    }

    public function setCodigoPostal($codigo_postal)
    {
        $this->codigo_postal = $codigo_postal;
    }

    public function setPais($pais)
    {
        $this->pais = $pais;
    }

    public function setEmpleados($empleados)
    {
        $this->empleados = $empleados;
    }

    // Método __toString()
    public function __toString()
    {
        return "Empresa: <br>" .
            "Nombre: " . $this->nombre . "<br>" .
            "Representante Legal: " . $this->represante_legal . "<br>" .
            "CIF: " . $this->CIF . "<br>" .
            "Dirección: " . $this->direccion . "<br>" .
            "Localidad: " . $this->localidad . "<br>" .
            "Código Postal: " . $this->codigo_postal . "<br>" .
            "País: " . $this->pais . "<br>" .
            "Empleados: " . $this->verEmpleados() . "<br>" .
            "Número de Empleados: " . $this->numero_de_empleados . "<br>";
    }

    public function verEmpleados()
    {
        foreach ($this->empleados as $key => $empleado) {
            echo "<br>$key => { <br>";
            foreach ($empleado as $key => $atributo) {
                echo $key . "=> $atributo <br>";
            }
            echo " }";
        }
    }
    // Añadir el empleado como si fuese un array con clave valor
    public function add_empleado($empleado)
    {
        $array_empleado = [
            "DNI" => $empleado->getDNI(),
            "Nombre" => $empleado->getNombre(),
            "Apellido" => $empleado->getApellido(),
            "Sueldo" => $empleado->getSueldo(),
            "Antiguedad" => $empleado->getAntiguedad(),
        ];
        array_push($this->empleados, $array_empleado);
    }

    public function eliminar_empleado($indice)
    {
        array_splice($this->empleados, $indice, 1); // eliminar elemento con ese indice y reordenar
    }

    public function visualizar_empleados($ver_empleados , $asc)
    {
        function cmp($a, $b)
        {
            return strcmp($a['Nombre'], $b['Nombre']);
        }
        usort($this->empleados, "cmp"); 
        if($asc) array_reverse($this->empleados);
        if($ver_empleados) $this->verEmpleados();
    }
    public function mas_antiguos()
    {
        $count = 0;
        $mayor = false;
        foreach ($this->empleados as $a) {
            while (count($this->empleados) <= $count || $mayor) {
                $b = $this->empleados[$count];
                if ($b->getAntiguedad()  > $a->getAntiguedad()) {
                } else {
                    $count++;
                }
            }
        }
    }

    public function listar_menos($prop, $ver_empleados)
    {
        // Usar una función anónima (closure) en lugar de una función tradicional
        usort($this->empleados, function ($a, $b) use ($prop) {
            return $a[$prop] - $b[$prop];
        });

        // Llamar al método para ver los empleados ordenados
        if($ver_empleados) $this->verEmpleados();
        
    }

    public function ver_media($prop)
    {
        if (count($this->empleados) <= 0) return 0;
        $suma = 0;
        foreach ($this->empleados as $empleado) {
            $suma += $empleado[$prop];
        }

        return $suma / count($this->empleados);
    }

    public function pagan_impuestos() {
        $this->visualizar_empleados(false, false);
        $lista = array();
        $count = 0;
        foreach($this->empleados as $empleado){
            if($empleado->verEmpleadoImpuestos()) $lista[$count++] = $empleado;
        }
    }
}
