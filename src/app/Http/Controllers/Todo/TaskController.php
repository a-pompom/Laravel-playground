<?php

namespace App\Http\Controllers\Todo;

use App\Services\Todo\CreateService;
use App\Services\Todo\DeleteService;
use App\Services\Todo\ReadService;
use App\Services\Todo\UpdateService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;

/**
 * Todoリスト機能を制御することを責務に持つ
 */
class TaskController extends BaseController
{
    private ReadService $readService;
    private CreateService $createService;
    private UpdateService $updateService;
    private DeleteService $deleteService;

    public function __construct(ReadService $readService, CreateService $createService, UpdateService $updateService, DeleteService $deleteService)
    {
        $this->readService = $readService;
        $this->createService = $createService;
        $this->updateService = $updateService;
        $this->deleteService = $deleteService;
    }

    /**
     * Todoリストを表示
     * @return View
     */
    public function index(): View
    {
        $tasks = $this->readService->read();

        return view('todo.index')->with('tasks', $tasks);
    }

    /**
     * やることを作成
     *
     * @param Request $request POSTボディを含むリクエスト
     * @return RedirectResponse 一覧画面表示処理へのリダイレクト
     */
    public function create(Request $request): RedirectResponse
    {
        $this->createService->create($request->post('name'));
        return redirect(route('task.index'));
    }

    /**
     * やることを更新
     *
     * @param Request $request POSTボディを含むリクエスト
     * @param int $id 更新対象
     * @return RedirectResponse 一覧画面表示処理へのリダイレクト
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $this->updateService->update($id, $request->post('name'));
        return redirect(route('task.index'));
    }

    /**
     * やることを削除
     *
     * @param int $id 削除対象
     * @return RedirectResponse 一覧画面表示処理へのリダイレクト
     */
    public function delete(int $id): RedirectResponse
    {
        $this->deleteService->delete($id);
        return redirect(route('task.index'));
    }
}
