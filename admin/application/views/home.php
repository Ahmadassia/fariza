<div class="ui segment">
    لیستى نوێترین بابەتەکان
</div>
<table  class="ui celled table">
    <thead>
        <tr>
            <th>ژمارە</th>
            <th>ناونیشانى بابەت</th>
            <th>نوسەر</th>
            <th>پۆلێن</th>
            <th>گۆڕانکارى</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach($article as $k => $val){
        $count = $k+1;
    echo "<tr>
            <td>{$count}</td>
            <td>{$val['title']}</td>
            <td>{$val['fullname']}</td>
            <td>{$val['cates']}</td>
            <td>
            <i data-id='{$val['id_article']}' data-page='home/removerec' class='trash red removeRec link icon'></i>
            
            </td>

        </tr>";
    }
    ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5"></td>
        </tr>
    </tfoot>
</table>