<button id="show__sidebar-btn" class="sidebar__toggle"><img src="/assets/img/icons/arrow.png" alt=""></button>
<button id="hide__sidebar-btn" class="sidebar__toggle"><img src="/assets/img/icons/arrow.png" alt=""></button>
<aside>
    <ul>
        <li>
            <a href="/post/add">
                <img src="/assets/img/icons/write.png" alt="">
                <h4>Добавить пост</h4>
            </a>
        </li>
        <li>
            <a href="/admin/dashboard/posts" class="<?= $active == 'posts' ? 'active' : '' ?>">
                <img src="/assets/img/icons/post.png" alt="">
                <h4>Управлять постами</h4>
            </a>
        </li>
        <li>
            <a href="/admin/user/add">
                <img src="/assets/img/icons/add-user.png" alt="">
                <h4>Добавить пользователя</h4>
            </a>
        </li>
        <li>
            <a href="/admin/dashboard/users" class="<?= $active == 'users' ? 'active' : '' ?>">
                <img src="/assets/img/icons/users.png" alt="">
                <h4>Управлять пользователями</h4>
            </a>
        </li>
        <li>
            <a href="/admin/category/add">
                <img src="/assets/img/icons/write2.png" alt="">
                <h4>Добавить категорию</h4>
            </a>
        </li>
        <li>
            <a href="/admin/dashboard/categories" class="<?= $active == 'categories' ? 'active' : '' ?>">
                <img src="/assets/img/icons/list.png" alt="">
                <h4>Управлять категориями</h4>
            </a>
        </li>
        
    </ul>
</aside>