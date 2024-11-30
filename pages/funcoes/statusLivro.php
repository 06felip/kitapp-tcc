    <?php 
    session_start();
    $con = new mysqli("localhost", "root", "", "dbkitap");


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    

        $cdLivro = $_POST['cd_livro'];
        $status = $_POST['status'];
        $cdUsuario = $_SESSION['cd_usuario'];   


        $checkSql = "SELECT * FROM tb_usuario_livros WHERE cd_usuario = '$cdUsuario' AND cd_livro = '$cdLivro'";
        $resultVerifica = $con->query($checkSql);

        if ($resultVerifica->num_rows > 0) {
            // Atualiza o status se o registro já existir
            $sqlUpdate = "UPDATE tb_usuario_livros SET status_livro = '$status' WHERE cd_livro = '$cdLivro' AND cd_usuario = '$cdUsuario'";
            $resUpdate = $con->query($sqlUpdate);
            echo "<script>window.location.href = '../home.php';</script>";
        } else{
            echo "<script>alert('Voce precisa ter umas interacao com o livro para poder criar um status');</script>";
            echo "<script>window.location.href = '../home.php';</script>";
        }

    }else{
        echo "error"; 
    }
