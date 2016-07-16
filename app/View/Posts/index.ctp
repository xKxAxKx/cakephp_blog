<h2>記事一覧</h2>

<?php //debug($posts) ?>

<table>
  <tr>
    <th>ID</th>
    <th>タイトル</th>
    <th>操作</th>
    <th>投稿日</th>
  </tr>
  <?php foreach ($posts as $post) : ?>
    <tr>
      <td><?php echo h($post['Post']['id']) ?></td>
      <td>
        <?php
          echo $this->Html->link($post['Post']['title'],
            array('controller' => 'posts','action' => 'view',$post['Post']['id'])
          )
         ?>
      </td>
      <td>
        <?php
          echo $this->Html->link('編集',
            array('controller' => 'posts','action' => 'edit',$post['Post']['id'])
          )
        ?>

        <?php
          echo $this->Form->postLink('削除',
            array('controller' => 'posts','action' => 'delete',$post['Post']['id']),
            array('confirm' => '本当に削除してよろしいですか?')
            )
        ?>
      </td>
      <td><?php echo h($post['Post']['created'])?></td>
    </tr>
  <?php endforeach ?>
</table>
