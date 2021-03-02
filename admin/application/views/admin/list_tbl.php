<table  class="ui celled table">
    <thead>
        <tr>
            <th>ژمارە</th>
            <th>ناوى تەواو</th>
            <th>ئیمەیل</th>
            <th>گۆڕانکارى</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach($list as $k => $val){
        $count = $k+1;
    echo "<tr>
            <td>{$count}</td>
            <td>{$val['fullname']}</td>
            <td>{$val['email']}</td>
            <td>
            <i data-id='{$val['idadm']}' data-page='admin/removerec' class='trash red removeRec link icon'></i>
            <i data-page='admin/form/' data-id='{$val['idadm']}' class='edit blue link prosForm icon'></i>
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