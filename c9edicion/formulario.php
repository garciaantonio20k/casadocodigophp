<form>
    <!-- ID de la tarea oculto para usuario -->
    <input type="hidden" name="id" value="<?php echo $tarea['id']; ?>">
    <div class="card">
        <h5 class="card-header">Nueva tarea</h5>
        <div class="card-body">


            <div class="form-group">
                <label for="nombre">Tarea:</label>
                <input type="text" id="nombre" class="form-control" name="nombre"
                       value="<?php echo $tarea['nombre']; ?>">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion (Opcional):</label>
                <input type="text" id="descripcion" class="form-control" name="descripcion"
                       value="<?php echo $tarea['descripcion']; ?>">
            </div>
            <div class="form-group">
                <label for="plazo">Plazo (Opcional):</label>
                <input type="text" id="plazo" class="form-control" name="plazo"
                       value="<?php echo convierteFechaMySQLParaFormulario($tarea['plazo']); ?>">
            </div>

            <!-- prioridad -->

            Prioridad
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input"
                           name="prioridad"
                           value="1"
                        <?php echo ($tarea['prioridad'] == 1) ? 'checked' : ''; ?> >Baja
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="prioridad" value="2"
                        <?php echo ($tarea['prioridad'] == 2) ? 'checked' : ''; ?>>Media
                </label>
            </div>
            <div class="form-check-inline disabled">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="prioridad" value="3"
                        <?php echo ($tarea['prioridad'] == 3) ? 'checked' : ''; ?>>Alta
                </label>
            </div>


            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="finalizada"
                       name="finalizada"
                       value="si"
                    <?php echo ($tarea['finalizada'] == 1) ? 'checked' : ''; ?>>
                <label class="form-check-label" for="finalizada">Tarea Finalizada</label>
            </div>

            <input type="submit" class="btn btn-primary"
                   value="<?php echo $tarea['id'] > 0 ? 'Actualizar' : 'Guardar'; ?>">
        </div>
</form>
