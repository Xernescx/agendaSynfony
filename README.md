# Agenda Symfony

Bienvenido a mi Agenda de Symfony, esta agenda te permite guardar tus contactos por _profesionales y personales_ para separarlos de formas ordenadas y no confundirte


## Como se usa?

Con la agenda abierta puedes crear guardar contactos _personales o profesionales_ con su:

| Opción | Descripción |
| ------ | ----------- |
| Nombre  | Nombre de la persona. |
| Apellido | Apellido de la persona. |
| Correo   | Correo de la persona. |
| Teléfono   |Teléfono de la persona. |
| Tipo de agenda   |Tipo de agenda personal o profesional.|
| Notas   |Información extra que se puede añadir como por ejemplo dirección, fechas de reuniones, nombre de su empresa entre otras cosas. |

Luego de ser agregado se puede ver las agendas agrupadas por tipo de agendas y se puede ver en una lista, además de eso puedes ver los contactos mas a fondo, editarlos y/o borrarlos

## Requisitos

Es necesario tener los siguientes programas o librerías para que funcione:

* Symfony
* Composer
* XAMPP
* Un lector de código como VS code


## Guía de instalación

Para usar la agenda tienes que descargarlos y guardarnos en una carpeta, luego con tu CMD vas a ejecutar el siguiente comando: 

    symfony server:start
   
Luego de esto podrás ir a tu puerto:

	http://127.0.0.1:8000/contacto/
    
Donde la agenda ya estará funcionando correctamente

## Tecnologías utilizadas.

* Symfony
* Composer
* VS code
* XAMPP
* MySQL


## Código del filtro de tipo de agenda

	/**
     * @Route("/{id}/edit", name="contacto_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Contacto $contacto): Response
    {
        $form = $this->createForm(ContactoType::class, $contacto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contacto_index');
        }

        return $this->render('contacto/edit.html.twig', [
            'contacto' => $contacto,
            'form' => $form->createView(),
        ]);
    }

## Autor
Mi persona **Carlos José Torres Baietti**

## Licencia

![Minion](https://tic100tifiko.files.wordpress.com/2018/10/cc-zero-badge.png?w=500)


## Cómo contribuir al proyecto.

Puedes usar el enlace de Git y modificarlo y/o mejorarlo en el siguiente enlace:

https://github.com/Xernescx/agendaSynfony

