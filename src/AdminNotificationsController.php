<?php

namespace Admin\Extend\AdminNotifications;

use Admin\Extend\AdminNotifications\Models\AdminNotification;
use Admin\Models\AdminUser;
use Admin\Page;
use App\Admin\Controllers\Controller;
use App\Admin\Delegates\Buttons;
use App\Admin\Delegates\Card;
use App\Admin\Delegates\Form;
use App\Admin\Delegates\SearchForm;
use App\Admin\Delegates\ModelTable;
use App\Admin\Delegates\ModelInfoTable;
use Lar\Layout\Respond;

class AdminNotificationsController extends Controller
{
    /**
     * Static variable Model
     * @var string
     */
    static $model = AdminNotification::class;

    public function defaultTools($type)
    {
        return !($type === 'add');
    }

    /**
     * @param  Page  $page
     * @param  Card  $card
     * @param  SearchForm  $searchForm
     * @param  ModelTable  $modelTable
     * @param  Buttons  $buttons
     * @return Page
     */
    public function index(
        Page $page,
        Card $card,
        SearchForm $searchForm,
        ModelTable $modelTable,
        Buttons $buttons,
    ) : Page {
        return $page->card(
            $card->search_form(
                $searchForm->id(),
                $searchForm->select('admin_user_id', 'Admin user')
                    ->load(AdminUser::class, 'id:email'),
                $searchForm->input('title', 'Title'),
                $searchForm->input('text', 'Text'),
                $searchForm->date_time_range('read_at', 'Read at'),
            ),
            $card->model_table(
                $modelTable->id(),
                $modelTable->col('Admin', 'admin.email')->sort('admin_user_id')->to_export(),
                $modelTable->col('Title', 'title')->sort()->to_export(),
                $modelTable->col('Text', 'text')->sort()->to_export(),
                $modelTable->col('Read at', 'read_at')->sort()->butty_date_time->to_export(),
                $modelTable->buttons(
                    $buttons->warning()
                        ->icon_play()
                        ->setTitle('Mark as read')
                        ->click(function ($id, Respond $respond) {
                            if ($notification = AdminNotification::where('id', $id)->where('admin_user_id', admin()->id)->first()) {
                                $notification->read_at = now();
                                $notification->save();
                                $respond->toast_success('Success marked as read!');
                            } else {
                                $respond->toast_error('Error when marked as read!');
                            }
                            return $respond->reload();
                        }, ['id']),
                    $buttons->danger()
                        ->icon_stop()
                        ->setTitle('Mark as no read')
                        ->click(function ($id, Respond $respond) {
                            if ($notification = AdminNotification::where('id', $id)->where('admin_user_id', admin()->id)->first()) {
                                $notification->read_at = null;
                                $notification->save();
                                $respond->toast_success('Success marked as no read!');
                            } else {
                                $respond->toast_error('Error when marked as no read!');
                            }
                            return $respond->reload();
                        }, ['id']),
                )
            ),
        );
    }

    /**
     * @param Page $page
     * @param Card $card
     * @param Form $form
     * @return Page
     */
    public function matrix(Page $page, Card $card, Form $form) : Page
    {
        return $page->card(
            $card->form(
                $form->ifEdit()->info_id(),
                $form->select('admin_user_id', 'Admin user')
                    ->load(AdminUser::class, 'id:email'),
                $form->input('title', 'Title'),
                $form->textarea('text', 'Text'),
                $form->date_time('read_at', 'Read at'),
                $form->ifEdit()->info_updated_at(),
                $form->ifEdit()->info_created_at(),
            ),
            $card->footer_form(),
        );
    }

    /**
     * @param Page $page
     * @param Card $card
     * @param ModelInfoTable $modelInfoTable
     * @return Page
     */
    public function show(Page $page, Card $card, ModelInfoTable $modelInfoTable) : Page
    {
        return $page->card(
            $card->model_info_table(
                $modelInfoTable->id(),
                $modelInfoTable->row('Admin', 'admin.email'),
                $modelInfoTable->row('Title', 'title'),
                $modelInfoTable->row('Text', 'text'),
                $modelInfoTable->row('Read at', 'read_at')->butty_date_time,
            ),
        );
    }

}
