<?php

namespace View 
{
    use Service\TodoListService;
    use Helper\InputHelper;

    class TodoListView 
    {
        private TodoListService $todoListService;

        public function __construct(TodoListService $todoListService)
        {
            $this->todoListService = $todoListService;
        }

        function showTodoList(): void
        {
            while (true) 
            {
                $this->todoListService->showTodolist();

                echo "MENU" . PHP_EOL;
                echo "1. Tambah Todo" . PHP_EOL;
                echo "2. Hapus Todo" . PHP_EOL;
                echo "3. Keluar" . PHP_EOL;

                $pilihan = InputHelper::input("Pilih");

                if ($pilihan == "1") {
                    $this->addTodolist();
                } else if ($pilihan == "2") {
                    $this->removeTodolist();
                } else if ($pilihan == "3") {
                    break;
                } else {
                    echo "Pilihan tidak dimengerti" . PHP_EOL;
                }

           }

           echo "Sampai Jumpa Lagi" . PHP_EOL;
        }

        function addTodoList(): void
        {
            echo "Menambah TODO" . PHP_EOL;

            $todo = InputHelper::input("Todo (x untuk batal)");

            if ($todo == "x"){
            // Batal
                echo "Batal menambah todo" . PHP_EOL;
            }else{
            $this->todoListService->addTodoList($todo);
            }    
        }

        function removeTodoList(): void
        {
            echo "Menghapus TODO" . PHP_EOL;

            $pilihan = InputHelper::input("Nomer(x untuk batal)");
            
            if($pilihan == "x")
            {
                echo "Batal menghapus todo" . PHP_EOL;
            }else{
                $this->todoListService->removeTodoList($pilihan);
            }
        }
    }
}


   