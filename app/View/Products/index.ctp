<?php 
$number_item_per_page = 5; //Số sản phẩm hiển thị trên 1 trang
$n = 0; ?>

<?php

foreach ($products as $product):
$n++;
?>

<div class='result' id="<?php echo "p".$n ?>">
    <div class='product-image' >
        <a href=''>
        <?php
        
        echo $this->Html->image($product['Product']['Thumbnail']) 
        ?>
        </a>
    </div>
    <div class='product-name'>
        <?php echo $product['Product']['TenSP'] ?>
    </div>
    <div class='product-price'>
        <?php echo $product['Product']['Gia'] ?>
    </div>
</div>
<?php
endforeach
?>
<div id='paging'>
    <div id='paging_inner'>
        <div id='page_text'>Bạn đang xem trang</div>
        <?php
        $number_of_page = $n / $number_item_per_page;
        $number_of_page=intval($number_of_page);
        echo $this->Html->div('page_conner','<<');
        echo $this->Html->div('page_conner','<','');
        for($i=1;$i<=$number_of_page;$i++)
            echo $this->Html->div('page_conner',$i,array("id"=>"page".$i));
        echo $this->Html->div('page_conner','>','');
        echo $this->Html->div('page_conner','>>');
        ?>
    </div>
    <script>
    $(document).ready(function(){
        var n_page=<?php echo $number_of_page ?>;
        var n_p_page=<?php echo $number_item_per_page ?>;
        var i,j;
        for(i=n_p_page;i<=n_p_page*n_page;i++){
            $('#p'+i).hide();
        }
        <?php for($i=1;$i<=$number_of_page;$i++): ?>
        $('#page<?php echo $i ?>').click(function(){
            for(var j=1;j<=<?php echo $n ?>;j++)
            {
                if((((<?php echo $i ?>-1)*n_p_page)<j)&&(j<=(<?php echo $i ?>*n_p_page+1)))
                    $('#p'+j).show();
                else
                    $('#p'+j).hide();
                    
            }
        });
        <?php endfor ?>
        
    });
</script>  
</div>    
     


