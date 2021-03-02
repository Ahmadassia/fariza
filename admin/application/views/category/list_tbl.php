<table  class="ui celled table">
    <thead>
        <tr>
            <th>ژمارە</th>
            <th>پۆلێن </th>
            <th>گۆڕانکارى</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach($list as $k => $val){
        $count = $k+1;
    echo "<tr>
            <td>{$count}</td>
            <td>{$val['category_name']}</td>
            <td>
                <i data-id='{$val['idcate']}' data-page='category/removerec' class='trash red removeRec link icon'></i>
                <i data-page='category/form/' data-id='{$val['idcate']}' class='edit blue link prosForm icon'></i>
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