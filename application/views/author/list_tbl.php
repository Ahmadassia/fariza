<table  class="ui celled table">
    <thead>
        <tr>
            <th>ژمارە</th>
            <th>ناونیشانى بابەت</th>
            <th>پۆلێن</th>
            <th>گۆڕانکارى</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach($list as $k => $val){
        $count = $k+1;
    echo "<tr>
            <td>{$count}</td>
            <td>{$val['title']}</td>
            <td>{$val['cates']}</td>
            <td>
            <i data-id='{$val['id_article']}' data-page='author/removerec' class='trash red removeRec link icon'></i>
            <i data-page='author/form/' data-id='{$val['id_article']}' class='edit blue link prosForm icon'></i>
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