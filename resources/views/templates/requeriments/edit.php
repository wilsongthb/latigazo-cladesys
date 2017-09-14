<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h3 class="text-center">EDITAR REQUERIMIENTO</h3>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <button ng-disabled="det.buttonAdd" ng-click="det.agregarRequeridos()" class="btn btn-primary"><i class="fa fa-spinner fa-pulse fa-fw" ng-show="det.buttonAdd"></i> {{!det.buttonAdd ? 'Agregar Productos Requeridos' : 'Cargando'}} </button>
                                <a href="<?= url('logistic/orders/') ?>/print/{{$routeParams.id}}" target="_blank">
                                    <button class="btn btn-success">Imprimir</button>
                                </a>
                                <a href="{{config.quotationsUrl + '/' + $routeParams.id}} " class="btn btn-warning"><i class="fa fa-money"></i> Cotización</a>
                                <a href="{{config.comparisonUrl + '/' + $routeParams.id}} " class="btn btn-warning"><i class="fa fa-cubes"></i> Comparación</a>
                                <a href="" class="btn btn-success" ng-click="dialogs.toExcel()"><i class="fa fa-file-excel-o"></i> Exportar en Excel</a>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                <h4>Formulario de Detalle</h4>
                                <form ng-submit="det.save()">
                                    <div class="form-group" ng-if="det.fila.id">
                                        <label for="">ID</label>
                                        <input type="text" class="form-control" ng-model="det.fila.id" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Producto *</label>
                                        <p class="form-control" title="Click para editar" disabled ng-if="det.fila.p_name" ng-bind="det.fila.p_name" ng-click="det.fila.p_name = null"></p>
                                        <ui-select ng-model="det.fila.products_id">
                                            <ui-select-match ng-show="!det.fila.p_name" placeholder="Escribe para buscar">{{$select.selected.name}} </ui-select-match>
                                            <ui-select-choices repeat="p.id as p in Products.list track by $index" refresh="Products.get($select.search)" refresh-delay="250">
                                                <span>{{p.name}}</span>
                                                <small>{{p.categorie}} - {{p.packing}} </small>
                                            </ui-select-choices>
                                        </ui-select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Cantidad *</label>
                                        <input type="text" ng-model="det.fila.quantity" required class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Detalle</label>
                                        <textarea rows="2" ng-model="det.fila.detail" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success" type="submit">Guardar</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
                                <h4>PRODUCTOS REQUERIDOS</h4>
                                <input type="text" ng-model="det.buscar" class="form-control" placeholder="Buscar">
                                <table class="table table-striped table-hover" id="productosRequeridos">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Producto</th>
                                            <th>Categoria</th>
                                            <th>Cantidad</th>
                                            <th>Detalle</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="d in det.list | filter: det.buscar">
                                            <td ng-bind="d.id"></td>
                                            <td ng-bind="d.p_name"></td>
                                            <td ng-bind="d.p_categorie"></td>
                                            <td ng-bind="d.quantity"></td>
                                            <td ng-bind="d.detail"></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-warning" title="Editar" ng-click="det.edit(d)"><i class="fa fa-pencil"></i> </button>
                                                    <button class="btn btn-danger" title="Eliminar" ng-click="det.delete(d)"><i class="fa fa-remove"></i> </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>